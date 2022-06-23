<?php exit;?>{
    "systemPassword": "AMhHhiMAVZFrwCv5Mn7Q",
    "systemName": "KodExplorer",
    "systemDesc": "-FileManager",
    "pathHidden": "Thumb.db,.DS_Store,.gitignore,.git",
    "autoLogin": "0",
    "needCheckCode": "0",
    "firstIn": "explorer",
    "passwordCheck": "0",
    "newUserApp": "",
    "newUserFolder": "document",
    "newGroupFolder": "share,文档,图片资料,视频资料",
    "groupShareFolder": "share",
    "desktopFolder": "desktop",
    "versionType": "A",
    "rootListUser": 0,
    "rootListGroup": 0,
    "csrfProtect": "0",
    "currentVersion": "4.48",
    "wallpageDesktop": "",
    "wallpageLogin": "",
    "menu": [
        {
            "name": "desktop",
            "url": "index.php%3Fdesktop",
            "target": "0",
            "subMenu": "0",
            "use": "1",
            "type": ""
        },
        {
            "name": "explorer",
            "url": "index.php%3Fexplorer",
            "target": "0",
            "subMenu": "0",
            "use": "1",
            "type": ""
        },
        {
            "name": "editor",
            "url": "index.php%3Feditor",
            "target": "0",
            "subMenu": "0",
            "use": "1",
            "type": ""
        }
    ],
    "pluginList": {
        "adminer": {
            "id": "adminer",
            "regiest": {
                "templateCommonHeader": "adminerPlugin.addMenu"
            },
            "status": 1,
            "config": {
                "pluginAuth": "role:1",
                "menuSubMenu": 1
            }
        },
        "toolsCommon": {
            "id": "toolsCommon",
            "regiest": {
                "user.commonJs.insert": "toolsCommonPlugin.echoJs"
            },
            "status": 1,
            "config": []
        },
        "zipView": {
            "id": "zipView",
            "regiest": {
                "user.commonJs.insert": "zipViewPlugin.echoJs",
                "globalRequest": "zipViewPlugin.changeData"
            },
            "status": 1,
            "config": {
                "pluginAuth": "all:1",
                "fileExt": "zip,tar,gz,tgz,ipa,apk,rar,7z,iso,bz2,zx,z,arj,epub",
                "fileSort": 10
            }
        }
    }
}