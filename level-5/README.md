# **Level 5: Static Methods and Properties**

In the WordPress Core, you will often see code that looks like this: `WP_Theme::get_instance();`. Notice the **`::`** (double colon) instead of the **`->`** (arrow).

This is called the **Static** keyword.

## **What is "Static"?**

Normally, you need to create an object (`new Tester`) to use a class. But sometimes, a class is just a "Library" of tools that doesn't need a specific instance. Static properties/methods belong to the **Class itself**, not to any specific object.

### **The Difference:**

* **Non-Static:** Every `Tester` has their *own* personal `$bugCount`. (If Mobarak finds 5 bugs and SirLouen finds 2, their counts stay separate).
* **Static:** A static property is **shared** by everyone. If you had a `static $totalBugsFoundByTeam`, every time any tester found a bug, that one number would go up for everyone.

#### **Example:**

```php
<?php

class TestTeam {
    public static $totalBugs = 0; // Shared by all members

    public static function logBug() {
        // Note: For static, we use 'self::' instead of '$this->'
        self::$totalBugs++;
    }
}

// NOTICE: We do NOT use 'new TestTeam()'
TestTeam::logBug();
TestTeam::logBug();

echo TestTeam::$totalBugs; // Output: 2

```

---

### **Why this matters for your Monday announcement:**

SirLouen mentioned that "core members pretend core testers have massive coding skills." A lot of the complex bugs in WordPress Core happen because of **Static Variables**. Since they are "shared," one part of the code might change a static variable, and it accidentally breaks another part of the site.

---

### **Your Final "Foundation" Task:**

Look at your previous code and this new "Static" concept.

1. Imagine you want to keep track of **every bug ever found** by all Testers combined.
2. Add a **static** property named `$totalGlobalBugs` to your `Tester` class.
3. Update your `foundBug()` method so that it increments **both** the private `$bugCount` (for that specific person) AND the static `$totalGlobalBugs` (for the whole team).

**Try to write that code. If you can do this, you have officially moved from "Beginner" to "Intermediate" PHP OOP in one day!**

*Note: Inside a normal method, you can use `$this->` for regular variables and `self::` for static ones.*
