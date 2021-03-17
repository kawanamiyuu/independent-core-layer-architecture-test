<?php

declare(strict_types=1);

namespace Tests\Architecture\ServiceLayer;

use Cake\Chronos\Chronos;
use PhpAT\Rule\Rule;
use PhpAT\Selector\Selector;
use PhpAT\Test\ArchitectureTest as BaseArchitectureTest;

class ArchitectureTest extends BaseArchitectureTest
{
    public function testActionCanOnlyDependOnCoreLayerAdapterAndHttpRequest(): Rule
    {
        return $this->newRule
            ->classesThat(Selector::haveClassName("Service\\Action\\*Action"))
            ->canOnlyDependOn()

            // Core Layer
//            ->classesThat(Selector::haveClassName("Service\\Action\\*Adapter"))
            ->andClassesThat(Selector::haveClassName("Core\\*"))

            // Http Request
            ->andClassesThat(Selector::haveClassName("Service\\Http\\*"))
            ->andClassesThat(Selector::haveClassName("Illuminate\\Http\\*"))

            // also can depend on Library
            ->andClassesThat(Selector::haveClassName(Chronos::class))

            ->build();
    }

    public function testAdapterCanOnlyDependOnCoreLayerAndInfrastructure(): Rule
    {
        return $this->newRule
            ->classesThat(Selector::haveClassName("Service\\Action\\*Adapter"))
            ->canOnlyDependOn()

            // Core Layer
            ->classesThat(Selector::haveClassName("Core\\*"))

            // Infrastructure
            ->andClassesThat(Selector::haveClassName("Service\\Eloquents\\*"))
            ->andClassesThat(Selector::haveClassName("Service\\Mail\\*"))

            // also can depend on Framework (except Http Request)
            ->andClassesThat(Selector::haveClassName("Illuminate\\*"))
            ->andExcludingClassesThat(Selector::haveClassName("Illuminate\\Http\\*"))

            ->build();
    }
}
