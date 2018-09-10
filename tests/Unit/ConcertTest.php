<?php
/**
 * Created by PhpStorm.
 * User: philipe
 * Date: 10/09/18
 * Time: 07:52
 */

namespace Tests\Unit;


use App\Concert;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ConcertTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    function can_get_formatted_date() {

        $concert = factory(Concert::class)->create([
            'date' => Carbon::parse('2016-12-01 8:00pm'),
        ]);


        $date = $concert->formatted_date;

        $this->assertEquals('December 1, 2016', $date);
    }

}
