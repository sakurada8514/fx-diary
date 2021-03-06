<?php

namespace Tests\Feature;

use App\Diary;
use App\ShareDiary;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


//ShareDiaryモデルテスト
class ShareDiaryTest extends TestCase
{
    use RefreshDatabase;

    //ファクトリーが使えることを確認
    /**
     * @test
     */
    public function testFactoryable()
    {
        $eloquent = app(ShareDiary::class);
        $this->assertEmpty($eloquent->get()); 
        $entity = factory(ShareDiary::class)->create([
            'user_id' => 1
        ]); 
        $this->assertNotEmpty($eloquent->get());
    }

    //ユーザーと日記とのリレーション
    /**
     * @test
     */
    public function shareDiariesHasOneUserDiary()
    {
        $shareDiaryEloquent = app(ShareDiary::class);
        $diaryEloquent = app(Diary::class);
        $user = factory(User::class)->create();
        $diary = factory(Diary::class)->create([
            'user_id' => $user->id
        ]); 
        $shareDiary = factory(ShareDiary::class)->create([
            'user_id' => $diary->user_id,
            'diary_id' => $diary->id,
        ]); 
        $this->assertNotEmpty($shareDiary->refresh()->user);
        $this->assertNotEmpty($shareDiary->refresh()->diary);
    }
}
