Given the directives defined an email template can now contain:

```
The total amount spent by all customers is {{lifetime_spend}}!
```

Which would render to

```
The total amount spent by all customers is $123.45!
```

This filter also defined the `should_bold` parameter which can be used like this:

```
The total amount spent by all customers is {{lifetime_spend should_bold=1}}!
```

and would output: 

```
The total amount spent by all customers is <strong>$123.45</strong>!
```

This directive defines `nl2br` as a default filter so if the output were to contain a newline it would automatically be converted to `<br />` unless filters were provided in the directive usage such as 

```
The total amount spent by all customers is {{lifetime_spend should_bold=1 |escape}}!
```

which would render

```
The total amount spent by all customers is &lt;strong&gt;$123.45&lt;/strong&gt;!
```

---

This module also defines a new `uppercase` filter which can be used to uppercase all text like this:

```
My name is {{trans "John %last" last="Doe" |uppercase}}!
```

which would render:

```
My name is JOHN DOE!
```