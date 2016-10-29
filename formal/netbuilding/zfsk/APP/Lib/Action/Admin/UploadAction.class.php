<?php
// 本类由系统自动生成，仅供测试用途
class UploadAction extends Action {

    public function upload($folder = '', $filetype = array('jpg', 'gif', 'png', 'jpeg'), $filesize = 6291456){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = $filesize ;// 设置附件上传大小
        $upload->allowExts  = $filetype;// 设置附件上传类型
        $upload->savePath =  './Public/upload/' . $folder;// 设置附件上传目录
        $upload->autoSub = true;
        $upload->subType = 'date';
        $upload->saveRule = 'uniqid';

        if(!$upload->upload()) {// 上传错误提示错误信息

            $result['status'] = 0;
            $result['info'] = $upload->getErrorMsg();

        }else{// 上传成功 获取上传文件信息
            import('ORG.Util.Image');
            $image = new Image();
            $result['status'] = 1;
            $result['info'] = $upload->getUploadFileInfo();
            $imgurl=$result['info'][0]['savepath'].$result['info'][0]['savename'];
            // dump($imgurl);die;
            $image->water($imgurl,'./Public/upload/image/real/logo.jpg',1);
              
        }
      
        
        return $result;
    }


    public function documents(){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = 3145728;// 设置附件上传大小
        $upload->allowExts  = array('pdf', 'xls', 'doc', 'ppt', 'xlsx', 'docx', 'pptx');// 设置附件上传类型
        $upload->savePath =  './Public/upload/documents/';// 设置附件上传目录
        $upload->autoSub = true;
        $upload->subType = 'date';
        $upload->saveRule = 'time';

        if(!$upload->upload()) {// 上传错误提示错误信息
            $this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
        }
        // 保存表单数据 包括附件数据
        $data['error'] = 0;
        $data['url'] =$info[0]['savename'];
        $data['type'] = $info[0]['extension'];
        // dump($info);die;
        $this->ajaxReturn($data, 'JSON');
    }

    public function ue(){
        date_default_timezone_set("Asia/chongqing");
        error_reporting(E_ERROR);
        header("Content-Type: text/html; charset=utf-8");

        $CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("./Conf/config.json")), true);
        $action = $_GET['action'];

        switch ($action) {
            case 'config':
                $result =  json_encode($CONFIG);
                break;

            /* 上传图片 */
            case 'uploadimage':
            /* 上传涂鸦 */
            case 'uploadscrawl':
            /* 上传视频 */
            case 'uploadvideo':
            /* 上传文件 */
            case 'uploadfile':
                $result = include(VENDOR_PATH . "Ueditoruploader/action_upload.php");
                break;

            /* 列出图片 */
            case 'listimage':
                $result = include(VENDOR_PATH . "Ueditoruploader/action_list.php");
                break;
            /* 列出文件 */
            case 'listfile':
                $result = include(VENDOR_PATH . "Ueditoruploader/action_list.php");
                break;

            /* 抓取远程文件 */
            case 'catchimage':
                $result = include(VENDOR_PATH . "Ueditoruploader/action_crawler.php");
                break;

            default:
                $result = json_encode(array(
                    'state'=> '请求地址出错'
                ));
                break;
        }

        /* 输出结果 */
        if (isset($_GET["callback"])) {
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
            } else {
                echo json_encode(array(
                    'state'=> 'callback参数不合法'
                ));
            }
        } else {
            echo $result;
        }
    }
  
}