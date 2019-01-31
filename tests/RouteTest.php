<?php

use PHPUnit\Framework\TestCase;
use App\Lib\Route as Route;

class RouteTest extends TestCase
{
    private $route;

    public function setUp()
    {
        $this->route = new Route();
    }

    /**
     * @dataProvider multiProvider
     */

    public function testControllerIsCorrect(string $uri, string $expected)
    {
        $_SERVER['REQUEST_URI'] = $uri;
        $end = $this->route->start();
        $result = $this->route->getController();
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider multiProvider2
     */

    public function testActionIsCorrect(string $uri, string $expected)
    {
        $_SERVER['REQUEST_URI'] = $uri;
        $this->route->start();
        $result = $this->route->getAction();
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider multiProvider3
     */

    public function testParamsIsCorrect(string $uri, string $expected)
    {
        $_SERVER['REQUEST_URI'] = $uri;
        $end = $this->route->start();
        $result = Route::getParams();
        $this->assertEquals($expected, $result);
    }

    public function multiProvider():array
    {
        //expected controllers
        return [
            ["/main", "Main"],
            ["/plants", "Products"],
            ["/plants/krupnomery", "Products"],
            ["/plants/decorative-leafy", "Products"],
            ["/products/show/12", "Products"],
            ["/cart", "Cart"],
            ["/order", "Order"],
            ["/user/registration", "User"],
            ["/user/login/", "User"],
            ["/user/logout/", "User"],
            ["/user/password_recovery_page", "User"],
            ["/user/profile", "User"],
            ["/user/profile/settings", "User"],
            ["/user/profile/order-history", "User"],
            ["/admin/add", "Admin"],
            ["/admin/edit/1", "Admin"],
            ["/admin/delete/12", "Admin"],
        ];
    }

    public function multiProvider2():array
    {
        //expected actions
        return [
            ["/main", "index"],
            ["/plants", "type_index"],
            ["/plants/krupnomery", "subtype_index"],
            ["/plants/decorative-leafy", "subtype_index"],
            ["/products/show/12", "show"],
            ["/cart", "index"],
            ["/order", "index"],
            ["/user/registration", "registration"],
            ["/user/login/", "login"],
            ["/user/logout/", "logout"],
            ["/user/password_recovery_page", "password_recovery_page"],
            ["/user/profile", "profile"],
            ["/user/profile/settings", "profile"],
            ["/user/profile/order-history", "profile"],
            ["/admin/add", "add"],
            ["/admin/edit/1", "edit"],
            ["/admin/delete/12", "delete"],
        ];
    }

    public function multiProvider3():array
    {
        //expected params
        return [
            ["/main", "1"],
            ["/plants", "1"],
            ["/plants/krupnomery", "1"],
            ["/plants/decorative-leafy", "1"],
            ["/products/show/12", "12"],
            ["/cart", "1"],
            ["/order", "1"],
            ["/user/registration", "1"],
            ["/user/login/", "1"],
            ["/user/logout/", "1"],
            ["/user/password_recovery_page", "1"],
            ["/user/profile", "1"],
            ["/user/profile/settings", "settings"],
            ["/user/profile/order-history", "order-history"],
            ["/admin/add", "1"],
            ["/admin/edit/1", "1"],
            ["/admin/delete/12", "12"],
        ];
    }
}
