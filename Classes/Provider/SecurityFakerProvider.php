<?php
declare(strict_types=1);

namespace Swisscom\AliceConnector\Provider;

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Security\Cryptography\HashService;
use Neos\Flow\Security\Policy\PolicyService;
use Neos\Flow\Security\Policy\Role;

/**
 * @Flow\Scope("prototype")
 */
class SecurityFakerProvider implements FakerProviderInterface
{
    /**
     * @Flow\Inject
     * @var PolicyService
     */
    protected $policyService;

    /**
     * @Flow\Inject
     * @var HashService
     */
    protected $hashService;

    /**
     * Password hash for the given password
     *
     * @param string $password
     * @param string $passwordHashingStrategy
     * @return string
     */
    public function passwordHash(string $password, string $passwordHashingStrategy = 'default'): string
    {
        return $this->hashService->hashPassword($password, $passwordHashingStrategy);
    }

    /**
     * Role object for the identifier
     *
     * @param string $roleIdentifier
     * @return Role|null
     */
    public function role(string $roleIdentifier): ?Role
    {
        return $this->policyService->getRole($roleIdentifier);
    }
}
