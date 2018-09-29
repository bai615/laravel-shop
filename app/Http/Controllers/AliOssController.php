<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OSS\OssClient;
class AliOssController extends Controller
{
    public $accessKeyId = "";
    public $accessKeySecret = "";
    public $endpoint = "";
    public $bucket = '';
    public $ossClient = '';

    public function index(Request $request)
    {
        $this->accessKeyId = config('UEditorUpload.core.aliyun.accessKeyId');
        $this->accessKeySecret = config('UEditorUpload.core.aliyun.accessKeySecret');
        $this->endpoint = config('UEditorUpload.core.aliyun.endpoint');
        $this->bucket = config('UEditorUpload.core.aliyun.bucket');
        $ossClient = new OssClient($this->accessKeyId, $this->accessKeySecret, $this->endpoint, false);
        $response = $ossClient->uploadFile($this->bucket, '15381855841.jpeg', 'storage/images/20180929/15381855841.jpeg', []);
//        $response = $oss->uploadFile('storage/images/20180929/15381848151.jpeg');
//        Storage::disk('oss'); // if default filesystems driver is oss, you can skip this step
//        $response = Storage::putFile('88e4b4d1c76c182d9d503905900d9689987c90866085ec9e7f374441813b6639.jpg', 'D:\workspace\laravel\laravel-shop\storage\app\public\images\88e4b4d1c76c182d9d503905900d9689987c90866085ec9e7f374441813b6639.jpg'); // upload file from local path
        var_dump($response);
        dump($response);
        exit;
    }
}