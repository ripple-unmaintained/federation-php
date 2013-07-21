# PHP Ripple Federation Endpoint

This projects provides some PHP example code to set up a trivial federation
endpoint with a static list of users.

# Usage

``` sh
git clone https://github.com/ripple/federation-php.git federation
cd federation
cp data-example.json data.json
```

Edit data.json to set your domain and your username -> address mappings.

For example, if your domain is `example.com` and you have one user `bob` whose
Ripple address is `rNDKeo9RrCiRdfsMG8AdoZvNZxHASGzbZL`. Your `data.json` would
look like this:

``` json
{
  "example.com" : {
    "bob" : "rNDKeo9RrCiRdfsMG8AdoZvNZxHASGzbZL"
  }
}
```

Then just [point](https://ripple.com/wiki/Federation_protocol#Service_declaration) your [ripple.txt](https://ripple.com/wiki/Ripple.txt) to this federation endpoint:

``` ini
[federation_url]
https://example.com/federation/
```

# License

This code is licensed under the [ISC license](http://opensource.org/licenses/ISC).
