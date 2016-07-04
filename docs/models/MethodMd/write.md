
# write

**Class** : MethodMd
**Namespace**  : alphayax\mdGen\models


> 


#### Signature

```php
 public function write();
```

#### Parameters

| Name | Type | Description |
|---|---|---|
| `` | $path |  |

#### Return


## Implementation

```php
    public function write( $path) {
        $m = new \Mustache_Engine([
            'loader'          => new \Mustache_Loader_FilesystemLoader( __DIR__.'/../views'),
            'partials_loader' => new \Mustache_Loader_FilesystemLoader(__DIR__ . '/../views/MethodMd'),

        ]);

        $generatedMd = $m->loadTemplate('Method')->render( $this);
        file_put_contents( $path . DIRECTORY_SEPARATOR . $this->name . '.md', $generatedMd);
    }

```