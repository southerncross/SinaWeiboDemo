SinaWeiboDemo
=============

# 简介

本demo使用了新浪微博开放API中的php工具包，用于抓取某条*原创*微博的转发列表，以及转发者基本信息

PS：本demo在分类上属于*站内应用*，目前我也不知道“站内应用”和其他应用具体有什么区别，所以不用在意

# 环境配置

## 运行环境是linux或unix（windows平台不是不行，只是因为要运行apache服务，linux和unix更容易使用）

## 安装并启动apache服务

debian系列：

    sudo apt-get -fy install apache2
    sudo /etc/init.d/apache2 restart
    
redhat系列：

    sudo yum install httpd -y
    sudo /etc/init.d/httpd restart
    
完毕后在浏览器中输入localhost，如果出现It works！的页面则成功
    
## 关闭selinux

debian系列：不需要

redhat系列：

    sudo setenforce 0

## 安装github客户端

PS：这步只是为了使用github客户端方便签出代码，所以不是必须的，因为可以直接从网站上下载本demo的代码

debian系列：
   
    sudo apt-get -fy install git
    
redhat系列：

    sudo yum install git
    
## 创建相关路径

debian系列：

apache的默认路径是/var/www/，在这个路径下建立一个可写目录，用于保存结果

    sudo mkdir /var/www/static
    
    chmod a+wx -R /var/www/static
    
## 安装php环境

deian系列：
    
    sudo apt-get install php5
    
redhat系列：

    sudo yum install php5
    
##  签出代码

PS：如果安装了github客户端就可以直接执行下面的命令clone代码到本地了

    git clone https://github.com/southerncross/SinaWeiboDemo.git
    
如果没有github客户端就直接通过网页下载本demo的代码吧

将代码（所有文件）复制到apache的默认页面路径，debian系统是/var/www/，redhat系统是/var/www/html/

# 使用方法

## 身份验证

在浏览器中输入localhost/index.php，进入授权页面，点击确认授权，显示授权成功

## 提取微博id

在浏览器中输入localhost/usertimeline.php，输入用户昵称，点击确定，得到该微博用户的最近发布微博列表

选择一条原创微博，记住id

## 修改配置文件

修改repoststimeline.php文件，将上一步的id填写在$ids数组中

## 获取转发列表

在浏览器中输入localhost/repoststimeline.php，在/var/www/static或/var/www/html/static路径下会创建result.txt文件，该文件就是这条微博的所有转发列表


