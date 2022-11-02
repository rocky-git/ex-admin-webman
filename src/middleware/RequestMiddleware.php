<?php


namespace ExAdmin\webman\middleware;


use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\HeaderBag;
use Webman\Http\Request;
use Webman\Http\Response;
use Webman\MiddlewareInterface;

class RequestMiddleware implements MiddlewareInterface
{

    public function process(Request $request, callable $handler): Response
    {
        //设置request
        \ExAdmin\ui\support\Request::init(function (\Symfony\Component\HttpFoundation\Request $q) use($request){
            $files = [];
            foreach ($request->file() as $key=>$file){
                $files[$key] = new UploadedFile($file->getPathname(),$file->getUploadName(),$file->getUploadMineType(),$file->getUploadErrorCode(),true);
            }
            $q->initialize($request->get(),$request->all(),[],$request->cookie(),$files,$_SERVER,$request->rawBody());
            $q->server->set('REQUEST_URI',$request->path());
            $q->headers = new HeaderBag($request->header());
            $q->setMethod($request->method());
        });

        return $handler($request);
    }
}