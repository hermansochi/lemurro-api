<?php

use Codeception\Util\HttpCode;
use Lemurro\AbstractCest;

class BExampleCest extends AbstractCest
{
    private string $default_name = 'test record';
    private string $modified_name = 'test record modified';
    private string $file1_name = 'example1.pdf';
    private string $file2_name = 'example2.pdf';
    private string $temp_file_id;
    private int $file1_id;
    private int $record_id;

    public function getIndex(ApiTester $I)
    {
        $I->sendGet('/example');

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'success' => true,
        ]);
    }

    /**
     * @depends getIndex
     */
    public function upload(ApiTester $I)
    {
        $I->sendPost('/file/upload', ['inline' => 0], ['uploadfile' => codecept_data_dir($this->file1_name)]);

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'success' => true,
        ]);

        $this->temp_file_id = $I->grabDataFromResponseByJsonPath('$.data.id')[0];
    }

    /**
     * @depends upload
     */
    public function insertRecord(ApiTester $I)
    {
        $I->sendPost('/example', [
            'json' => '{"id":"0","name":"' . $this->default_name . '","files":[{"file_id":"' . $this->temp_file_id . '","action":"add","orig_name":"' . $this->file1_name . '"}]}',
        ]);

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'success' => true,
            'data' => [
                'files_errors' => [],
            ],
        ]);

        $this->record_id = (int) $I->grabDataFromResponseByJsonPath('$.data.id')[0];
    }

    /**
     * @depends insertRecord
     */
    public function getRecord(ApiTester $I)
    {
        $I->sendGet('/example/' . $this->record_id);

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'success' => true,
            'data' => [
                'id' => $this->record_id,
                'name' => $this->default_name,
                'files' => [
                    [
                        'name' => 'example1',
                        'ext' => 'pdf',
                    ],
                ],
            ],
        ]);

        $this->file1_id = (int) $I->grabDataFromResponseByJsonPath('$.data.files[0].id')[0];
    }

    /**
     * @depends getRecord
     */
    public function upload2(ApiTester $I)
    {
        $I->sendPost('/file/upload', ['inline' => 0], ['uploadfile' => codecept_data_dir($this->file2_name)]);

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'success' => true,
        ]);

        $this->temp_file_id = $I->grabDataFromResponseByJsonPath('$.data.id')[0];
    }

    /**
     * @depends upload2
     */
    public function saveRecord(ApiTester $I)
    {
        $I->sendPost('/example/' . $this->record_id, [
            'json' => '{"id":"' . $this->record_id . '","name":"' . $this->modified_name . '","files":[{"file_id":"' . $this->file1_id . '","action":"remove"},{"file_id":"' . $this->temp_file_id . '","action":"add","orig_name":"' . $this->file2_name . '"}]}',
        ]);

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'success' => true,
            'data' => [
                'files_errors' => [],
            ],
        ]);
    }

    /**
     * @depends saveRecord
     */
    public function removeRecord(ApiTester $I)
    {
        $I->sendPost('/example/' . $this->record_id . '/remove');

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"success":true,"data":{"id":' . $this->record_id . '}}');
    }
}
