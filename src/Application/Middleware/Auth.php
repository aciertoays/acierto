<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use DI\Container;
use App\Domain\Auth\AuthRepository;
use Slim\Exception\HttpBadRequestException;
use App\Application\Actions\Auth\VerifyAuthstatus;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\MiddlewareInterface as Middleware;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;


final class Auth extends Base implements Middleware
{
   
    
    public function process(Request $request, RequestHandler $handler): Response
    {
        $jwtHeader = $request->getHeaderLine('Authorization');
        
        if (!$jwtHeader) {
            throw new HttpBadRequestException($request, "Could not resolve data");
        }

        $jwt = explode('Bearer ', $jwtHeader);
        if (!isset($jwt[1])) {
            throw new HttpBadRequestException($request, "JWT Token invalid.");
        }
        $decoded =  VerifyAuthstatus::action($jwt[1], $this->container->get(AuthRepository::class));
        $object = (array) $request->getParsedBody();
        $object['decoded'] = $decoded;

        return $handler->handle($request);
       
    }
}
