uid = "3"
key = "hp"

remote = ("localhost", 80)
page = "/ss/ssupload.php"

remote = ("ssproject.bishwa.net", 80)
page = "/ssupload.php"

procs = ["/usr/sbin/sshd"
        ,"/usr/sbin/httpd"
        ,"/usr/sbin/mysqld"
        ]

interfaces = ["eth0"]

pidfile = "ssclient.pid"
