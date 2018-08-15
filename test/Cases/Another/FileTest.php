<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Test\Cases\Another;

use Swoft\Test\AbstractTestCase;

class FileTest extends AbstractTestCase
{
    public function testExportCsv()
    {
        $csv_header = ['id', 'name'];
        $csv_body = [
            [1, 'limx'],
            [2, 'Agnes'],
        ];
        $file = alias('@runtime') . '/test.csv';
        // 打开文件资源，不存在则创建
        $fp = fopen($file, 'a');
        // 处理头部标题
        $header = implode(',', $csv_header) . PHP_EOL;
        // 处理内容
        $content = '';
        foreach ($csv_body as $k => $v) {
            $content .= implode(',', $v) . PHP_EOL;
        }
        // 拼接
        $csv = $header . $content;
        // 写入并关闭资源
        fwrite($fp, $csv);
        fclose($fp);

        $this->assertTrue(file_exists($file));
    }
}
