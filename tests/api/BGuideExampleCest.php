<?php

use Codeception\Util\HttpCode;
use Lemurro\AbstractCest;

class BGuideExampleCest extends AbstractCest
{
    private string $type = 'example';
    private string $default_name = 'test record';
    private string $modified_name = 'test record modified';
    private int $record_id;

    // tests
    public function getIndex(ApiTester $I)
    {
        $I->sendGet('/guide/' . $this->type);

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"success":true,"data":{"js_class":"guideExample","count":0,"items":[]}}');
    }

    /**
     * @depends getIndex
     */
    public function insertRecord(ApiTester $I)
    {
        $I->sendPost('/guide/' . $this->type, [
            'json' => '{"id":"0","name":"' . $this->default_name . '"}',
        ]);

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'success' => true,
            'data' => [
                'name' => $this->default_name,
            ],
        ]);

        $this->record_id = (int) $I->grabDataFromResponseByJsonPath('$.data.id')[0];
    }

    /**
     * @depends insertRecord
     */
    public function getRecord(ApiTester $I)
    {
        $I->sendGet('/guide/' . $this->type . '/' . $this->record_id);

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'success' => true,
            'data' => [
                'id' => $this->record_id,
                'name' => $this->default_name,
            ],
        ]);
    }

    /**
     * @depends getRecord
     */
    public function saveRecord(ApiTester $I)
    {
        $I->sendPost('/guide/' . $this->type . '/' . $this->record_id, [
            'json' => '{"id":"' . $this->record_id . '","name":"' . $this->modified_name . '"}',
        ]);

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'success' => true,
            'data' => [
                'id' => $this->record_id,
                'name' => $this->modified_name,
            ],
        ]);
    }

    /**
     * @depends saveRecord
     */
    public function removeRecord(ApiTester $I)
    {
        $I->sendPost('/guide/' . $this->type . '/' . $this->record_id . '/remove');

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"success":true,"data":{"id":' . $this->record_id . '}}');
    }
}
