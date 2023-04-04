uid = "1"
key = "vaiosstest"

remote = ("ss-shankarkec.rhcloud.com", 80)
page = "/ssupload.php"

remote = ("localhost", 80)
page = "/ssupload.php"

procs = ["/usr/sbin/sshd"
        ,"/usr/sbin/httpd"
        ,"/usr/sbin/mysqld"
        ]

interfaces = ["eth0"]

pidfile = "ssclient.pid"
