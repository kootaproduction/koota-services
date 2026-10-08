<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PortfolioBannerTest extends TestCase
{
    use RefreshDatabase;

    public function test_portfolio_keeps_the_catalog_visible_when_no_banner_image_exists(): void
    {
        $response = $this->get(route('portfolio.index'));

        $response->assertOk()
            ->assertDontSee('alt="Banner portofolio KOOTA SERVICES"')
            ->assertSee('Pembersihan Rumah');
    }
}
