<?php
namespace Starbug\Intl;

use Starbug\Api\Controller\CollectionController;
use Starbug\Intl\Collection\SelectAddressCollection;
use Starbug\Intl\Controller\AddressController;
use Starbug\Routing\Route;
use Starbug\Routing\RouteProviderInterface;

class RouteProvider implements RouteProviderInterface {

  public function configure(Route $routes) {
    $routes->addRoute("address/form[/{locale}]", AddressController::class, [
      "format" => "xhr",
      "groups" => "user"
    ]);

    $api = $routes->getRoute("api");
    $select = $api->addRoute("/address/select.{format:json}");
    $select->setController(CollectionController::class);
    $select->setOptions(["model" => "address", "collection" => SelectAddressCollection::class]);
  }
}
