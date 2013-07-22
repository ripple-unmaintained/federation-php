# PHP Ripple Federation Endpoint

This projects provides some PHP example code to set up a trivial federation
endpoint with a static list of users.

# Quickstart

``` sh
git clone https://github.com/ripple/federation-php.git federation
cd federation
cp private/data-example.json private/data.json
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

You should configure your webserver to disallow access to the
`/federation/private/` folder.

# Configuration

The basic configuration format is:

{
  "[domain]": {
    "[user]": "[Ripple address]"
  }
}

## Domain aliases

You can alias one domain to another one like so:

{
  "example.com": {
    "testuser": "rNDKeo9RrCiRdfsMG8AdoZvNZxHASGzbZL"
  },
  "example-alias.com": "example.com"
}

Any query against an alias domain will be answered as if it was against the
original domain. In the example above a query for domain `example-alias.com` and
user `testuser` would be answered as `rNDKeo9RrCiRdfsMG8AdoZvNZxHASGzbZL`.

# License

This code is licensed under the [ISC license](http://opensource.org/licenses/ISC).
