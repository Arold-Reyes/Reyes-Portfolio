<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Arold Mina Reyes');
        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
        $response->assertHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
    }

    public function test_home_page_renders_the_portfolio_sections(): void
    {
        $response = $this->get('/');

        $response->assertSee('About Me');
        $response->assertSee('Technical Proficiency');
        $response->assertSee('Projects');
        $response->assertSee('Experience &amp; Education', false);
        $response->assertSee('Certificates &amp; Webinars', false);
        $response->assertSee('Get In Touch');
    }

    public function test_home_page_includes_the_current_dikt_ojt_timeline_entry(): void
    {
        $response = $this->get('/');

        $response->assertSee('Department of Information and Communications Technology');
        $response->assertSee('2026 - Present');
    }

    public function test_home_page_lists_projects_with_details(): void
    {
        $response = $this->get('/');

        $response->assertSee('Bangued Ka-Fuel');
        $response->assertSee('Loan Management System');
        $response->assertSee('Abra Quest');
        $response->assertSee('TaskManager');
        $response->assertSee('https://github.com/ReyesArold/task-manager');
    }

    public function test_home_page_includes_social_and_structured_data(): void
    {
        $response = $this->get('/');

        $response->assertSee('og:image', false);
        $response->assertSee('images/og-image.png');
        $response->assertSee('application/ld+json', false);
        $response->assertSee('og:image:width', false);
    }

    public function test_home_page_exposes_accessible_ui_controls(): void
    {
        $response = $this->get('/');

        $response->assertSee('Back to top');
        $response->assertSee('aria-controls="project-grid"', false);
        $response->assertSee(':aria-pressed', false);
        $response->assertSee('aria-describedby="name-error"', false);
        $response->assertSee('Filter projects by category');
        $response->assertSee('Filter certificates by category');
    }

    public function test_sitemap_and_robots_files_are_served(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee('<urlset', false);

        $this->get('/robots.txt')
            ->assertOk()
            ->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Sitemap:');
    }
}
