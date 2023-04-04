#!/usr/bin/python

## ssclient.py - Server Security Client.

ver = 1.0


import socket, os, sys, re, getopt, json, commands

try:
        import ssconf
except ImportError, err:
        print "Couldn't import the config."
        raise err


def args():
        global confpath
        try:
                opts, args = getopt.gnu_getopt(sys.argv[1:], "v")
        except getopt.GetoptError, err:
                print str(err)
                print "Flags:"
                print " -v (version)"
        for o, a in opts:
                if o == "-v":
                        print "SSClient: Server Security Client"
                        print "<http://github.com/shankarbhattarai/ssclient>"
                        print "Part of Server Security <http://github.com/shankarbhattarai/ss>"
                        print "Copyright (C) 2015 Shankar Bhattarai."
                        print "Version %.1f" % ver
                        sys.exit(0)

def put(sock, buf):
        if isinstance(buf, (list, tuple)):
            for scalar in buf: put(sock, scalar)
        else:
            sock.send(str(buf)+"\r\n")


def getHostname():
        rp = os.popen("/bin/hostname")
        line = rp.readline()
        return line.strip()

def getPS():
        apps = []
        run = 0
        svcs = {}
        lines = []
        rp = os.popen("/bin/ps ax -o command=")
        flines = rp.readlines()
        for l in flines:
                lines.append((l.strip().split(' '))[0])
        for pn in ssconf.procs:
                if pn in lines:
                        svcs[pn] = True
                        run += 1
                else:
                        svcs[pn] = False
        dic = {}
        dic['allps'] = len(lines)
        dic['runsvc'] = run
        dic['allsvc'] = len(ssconf.procs)
        dic['svcs'] = svcs
        return dic

def getWho():
        users = {}
        rp = os.popen("/usr/bin/who -q")
        line = rp.readline()
        words = line.strip().split(' ')
        for word in words:
            '''
            if word in users:
                #users[word] = users[word] + 1
                users[word] += 1
            else:
                users[word] = 1
            '''
            try:
                users[word] += 1
            except KeyError:
                users[word] = 1
        return users

def getIPs():
        ary = []
        rp = os.popen("/sbin/ifconfig | grep 'inet addr:' | grep -v '127.0.0.1' | cut -d: -f2 | awk '{print $1}'")
        lines = rp.readlines()
        for line in lines:
                ip = line.strip()
                host = socket.getfqdn(ip)
                ary.append({'ip': ip, 'host': host})
        return ary

def getUptime():
        rp = os.popen("/usr/bin/uptime")
        line = rp.readline()
        sects = line.split(', ', 2)
        timeuptime = sects[0]
        textload = sects[2]
        uptime = (timeuptime.split('up '))[1].strip()
        loads = (textload.split(': '))[1].split(', ')
        load1 = float(loads[0].strip())
        load5 = float(loads[1].strip())
        load15 = float(loads[2].strip())
        return {'uptime': uptime, 'load1': load1, 'load5': load5, 'load15': load15}

def getRAM():
        rp = os.popen("/usr/bin/free -m")
        rp.readline()
        line = rp.readline()
        words1 = line.split(' ')
        words = []
        for w in words1:
                if w != '': words.append(w)
        total = int(words[1])
        used = int(words[2])
        free = int(words[3])
        bufcac = int(words[5])+int(words[6])
        return {'used': used, 'free': free, 'total': total, 'bufcac': bufcac}

def getDisk():
        dics = {'single': [], 'total': {'avail': 0, 'used': 0, 'total': 0}}
        last = []
        rp = os.popen("/bin/df -TP -B 1073741824")
        rp.readline()
        lines = rp.readlines()
        for l in lines:
                m = re.match(r"(.+?)\s+([\w\-]+)\s+([\d.]+\w?)\s+([0-9.]+\w?)\s+([0-9.]+\w?)\s+(?:\d+%)\s*(.*)", l).groups()
                # TYPE:FS:MP:TOTAL:USED:AVAIL
                dics['single'].append({'type': m[1], 'fs': m[0], 'mount': m[5], 'total': int(m[2]), 'used': int(m[3]), 'avail': int(m[4])})
        for item in dics['single']:
                dics['total']['total'] += item['total']
                dics['total']['used'] += item['used']
                dics['total']['avail'] += item['avail']
        return dics

def getInterfaces():
       # dev = open("/proc/net/dev", "r").readlines()

        #values={}
        #for line in dev[2:]:
         #       intf = line[:line.index(":")].strip()
          #      if intf in ssconf.interfaces:
           #             values[intf] = [int(value) for value in line[line.index(":")+1:].split()]
        #return values

		#ips = commands.getoutput("/sbin/ifconfig | grep -i \"inet\" | grep -iv \"inet6\" | " +
        #                 "awk {'print $2'} | sed -ne 's/addr\:/ /p'")
		#return ips
		s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
		s.connect(('8.8.8.8', 0))  # connecting to a UDP address doesn't send packets
		local_ip_address = s.getsockname()[0]
		return local_ip_address

args()
s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
s.connect(ssconf.remote)

data = {
        "hostname": getHostname(),
        "interfaces": getInterfaces(),
        "ps": getPS(),
        "who": getWho(),
        "uplo": getUptime(),
        "ram": getRAM(),
        "ips": getIPs(),
        "disk": getDisk(),
        "key": ssconf.key,
        "uid": ssconf.uid,
}


dump = json.dumps(data)

put(s, "POST %s HTTP/1.1" % ssconf.page)
put(s, "Host: %s" % ssconf.remote[0])
put(s, "Content-Type: application/x-www-form-urlencoded")
put(s, "Content-Length: %d" % len(dump))
put(s, "User-Agent: SS/%.1f" % ver)
put(s, "Connection: close")
put(s, "")
put(s, dump)
put(s, "")

print s.recv(1024)

try:
        s.shutdown(socket.SHUT_RDWR)
        s.close()
except socket.error, err:
        pass

