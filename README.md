# 泰山学堂歌咏比赛投票系统


![](images/qrcode.png "扫描二维码进入投票系统")
URL: [www.peter-sia.top/taishan-singing/](www.peter-sia.top/taishan-singing)

## Annotation

- 工程下started.txt需要读写权限

    
    chmod 777 started.txt

- 需要自己配置config.php文件，内含常量servername, username, password 和 dbname
- 接口
    - submit.php?started=true 开启投票
    - submit.php?started=false 关闭投票
    - mysql.php 查看投票情况
