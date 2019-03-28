<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/3/28
 * Time: 3:55 PM
 */

namespace Containers;

use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\ValidationData;

class JwtContainer
{
    private $settings;
    private $issuer;
    private $audience;
    private $id;

    public $expiration = 86400;

    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->issuer = $settings['issuer'];
        $this->audience = $settings['audience'];
        $this->id = $settings['id'];
    }

    public function create($data)
    {
        $signer = new Sha256();
        $token = (new Builder())->setIssuer($this->issuer) // Configures the issuer (iss claim)
        ->setAudience($this->audience) // Configures the audience (aud claim)
        ->setId($this->id, true) // Configures the id (jti claim), replicating as a header item
        ->setIssuedAt(time()) // Configures the time that the token was issued (iat claim)
//        ->setNotBefore(time() + 60) // Configures the time that the token can be used (nbf claim)
        ->setExpiration(time() + $this->expiration) // Configures the expiration time of the token (exp claim)
        ->set('uid', $data['uid']) // Configures a new claim, called "uid"
        ->sign($signer, $this->settings['sign'])
        ->getToken(); // Retrieves the generated token

        return $token; // The string representation of the object is a JWT string (pretty easy, right?)
    }

    public function validate($token)
    {
        $token = (new Parser())->parse((String) $token);
        $signer = new Sha256();
        if (!$token->verify($signer, $this->settings['sign'])) {
            return 1; //签名不正确
        }

        $data = new ValidationData(); // It will use the current time to validate (iat, nbf and exp)
        $data->setIssuer($this->issuer);
        $data->setAudience($this->audience);
        $data->setId($this->id);

        return $token->validate($data); // false, because token is expired since current time is greater than exp
    }
}