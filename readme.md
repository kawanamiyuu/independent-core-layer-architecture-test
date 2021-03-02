# Architecture Test Example for Independent core layer pattern

## What is Independent core layer pattern

* https://github.com/shin1x1/independent-core-layer-laravel
* https://blog.shin1x1.com/entry/independent-core-layer-pattern

## Architecture Tests

### via [qossmic/deptrac](https://github.com/qossmic/deptrac)

> Deptrac is a static code analysis tool that helps to enforce rules for dependencies between software layers in your PHP projects.

Run tests

```bash
$ php deptrac.phar analyze depfile.yaml
$ php deptrac.phar analyze depfile-core.yaml
$ php deptrac.phar analyze depfile-service.yaml
```

or

```bash
$ composer deptrac
```

### via [phpat/phpat](https://github.com/carlosas/phpat)

> **PHP Architecture Tester** is a static analysis tool to verify architectural requirements.
>
> It provides a natural language abstraction to define your own architectural rules and test them against your software. You can also integrate _phpat_ easily into your toolchain.

Run tests

```bash
$ ./vendor/bin/phpat phpat-core.yaml
$ ./vendor/bin/phpat phpat-serivce.yaml
```

or

```bash
$ composer phpat
```
