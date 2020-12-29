<?php

declare(strict_types=1);

use KrzysztofRewak\PhpCsFixer\DoubleQuoteFixer\DoubleQuoteFixer;
use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer;
use PhpCsFixer\Fixer\Operator\NotOperatorWithSuccessorSpaceFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

$sets = [
    SetList::CLEAN_CODE,
    SetList::PSR_12,
    SetList::PHP_71,
    SetList::COMMON,
];

$skipped = [
    SingleQuoteFixer::class => null,
    ClassAttributesSeparationFixer::class => null,
    NotOperatorWithSuccessorSpaceFixer::class => null,
];

$rules = [
    DeclareStrictTypesFixer::class => null,
    CastSpacesFixer::class => ["space" => "none"],
    DoubleQuoteFixer::class => null,
];

return static function (ContainerConfigurator $containerConfigurator) use ($sets, $skipped, $rules): void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::SETS, $sets);
    $parameters->set(Option::SKIP, $skipped);

    $parameters->set(Option::PATHS, ["app", "config", "database", "resources/lang", "routes"]);

    $services = $containerConfigurator->services();
    foreach ($rules as $rule => $configuration) {
        $service = $services->set($rule);
        if ($configuration) {
            $service->call("configure", [$configuration]);
        }
    }
};
