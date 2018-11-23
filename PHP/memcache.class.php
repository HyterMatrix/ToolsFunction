<?php
/**
* 一个简单的memchached类
*/
class Mem
{
    private $type = 'Memcached';
    private $m;
    private $time;
    private $error;
    private $debug = 'true'; // 调试模式

    public function __construct()
    {
        if(!class_exists($this->type)){
            $this->error = 'No '.$this->type;
            return false;
        }else{
            $this->m = new $this->type;
        }

    }

    // 连接memchache服务器
    public function addServer($arr)
    {
        $this->m->addServers($arr);
    }

    /**通过参数判断 需要执行的操作
     * 只有一个参数 表示获取数据
     * 有两个参数 且$value === null 表示删除数据
     * 有三个参数 表示设置或修改数据
     * @param $key 键
     * @param string $value 值
     * @param null $time 保存时间
     * @return bool
     */
    public function s($key, $value='', $time = null)
    {
        $number = func_num_args();
        if($number == 1){
           return $this->get($key);
        }elseif ($number >= 2){
            if($value === null){
                $this->delete($key);
            }else{
                $this->set($key,$value,$time);
            }
        }
    }


    // 添加数据或修改数据
    private function set($key, $value, $time = null)
    {
        if($time === null){
            $time = $this->time;
        }
        $this->m->set($key,$value,$time);

        if($this->debug){
            if ($this->m->getResultCode() != 0){
                return false;
            }
        }


    }
    // 获取数据
    private function get($key)
    {
        $return =  $this->m->get($key);
        if($this->debug) {
            if ($this->m->getResultCode() != 0) {
                return false;
            } else {
                return $return;
            }
        }else{
            return $return;
        }
    }

    //删除数据
    private function delete($key)
    {
        $this->m->delete($key);
    }

    // 获取错误信息
    private function getError()
    {
        if($this->error){
            return $this->error;
        }else{
            return $this->m->getResultMessage();
        }
    }

}

//demo

$m = new Mem();
$m->addServer(array(array('192.168.80.128',11211),));

$m->s('key', 'value', 1800);
echo $m->s('key');
$m->s('key', null);
echo $m->s('key');
echo $m->getError();
