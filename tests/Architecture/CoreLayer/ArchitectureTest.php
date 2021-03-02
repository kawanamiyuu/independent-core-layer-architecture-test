<?php

declare(strict_types=1);

namespace Tests\Architecture\CoreLayer;

use PhpAT\Rule\Rule;
use PhpAT\Selector\Selector;
use PhpAT\Test\ArchitectureTest as BaseArchitectureTest;

class ArchitectureTest extends BaseArchitectureTest
{
    public function testCoreLayerMustNotDependOnServiceLayerAndFramework(): Rule
    {
        return $this->newRule
            ->classesThat(Selector::haveClassName("Core\\*")) // Core Layer
            ->mustNotDependOn()
            ->classesThat(Selector::haveClassName("Service\\*"))  // Service Layer
            ->andClassesThat(Selector::haveClassName("Illuminate\\*")) // Framework
            ->build();
    }

    public function testDomainMustNotDependOnUseCase(): Rule
    {
        return $this->newRule
            ->classesThat(Selector::haveClassName("Core\\*\\Domain\\*"))
            ->mustNotDependOn()
            ->classesThat(Selector::haveClassName("Core\\*\\UseCase\\*"))
            ->build();
    }
}
