### **Level 15: The Heart of WordPress — Hooks (Actions & Filters)**

এবার আমরা এমন একটি বিষয় শিখব যা ছাড়া ওয়ার্ডপ্রেসের অস্তিত্ব কল্পনা করা যায় না। আপনি যদি হুকস (Hooks) না বোঝেন, তবে আপনি ওয়ার্ডপ্রেস কোর বা প্লাগইনের বাগ কখনোই নিখুঁতভাবে ধরতে পারবেন না।

#### **১. হুকস (Hooks) কী?**

**বাংলা ধারণা:**
ওয়ার্ডপ্রেস কোর কোডটি একটি বিশাল সুতার মতো যা শুরু থেকে শেষ পর্যন্ত রান করে। হুকস হলো ওই সুতার মাঝখানে থাকা কিছু **"হুক" বা "আংটা"**, যেখানে আপনি আপনার নিজের কোড ঝুলিয়ে দিতে পারেন। আপনি মূল কোর ফাইল পরিবর্তন না করেই ওয়ার্ডপ্রেসের কাজ করার ধরন বদলে দিতে পারেন।

**English Concept:**
Hooks are a way for one piece of code to interact with or modify another piece of code at specific points. They allow you to "hook into" the WordPress execution process without editing core files.

---

#### **২. হুকস দুই প্রকার: Actions এবং Filters**

এটি মনে রাখা খুব জরুরি। অনেকে এই দুটোর মধ্যে গুলিয়ে ফেলেন:

**A. Actions (`do_action` / `add_action`)**

* **কাজ:** এটি কোনো একটি নির্দিষ্ট সময়ে কোনো কাজ **ঘটায় (Trigger)**।
* **উদাহরণ:** "যখন একটি পোস্ট পাবলিশ হবে, তখন লেখককে একটি ইমেইল পাঠাও।"
* **বৈশিষ্ট্য:** এটি সাধারণত কোনো ভ্যালু রিটার্ন করে না, শুধু একটি কাজ সম্পন্ন করে।

**B. Filters (`apply_filters` / `add_filter`)**

* **কাজ:** এটি কোনো ডাটাকে **পরিবর্তন (Modify)** করে।
* **উদাহরণ:** "পোস্টের টাইটেল দেখানোর আগে সব অক্ষর বড় হাতের (Uppercase) করে দাও।"
* **বৈশিষ্ট্য:** এটি অবশ্যই ডাটা রিসিভ করবে এবং পরিবর্তন শেষে ডাটা **রিটার্ন (Return)** করবে।

---

### **৩. কোড উদাহরণ (Code Comparison)**

**Action Example:**

```php
// ১. এখানে একটি হুক রাখা হয়েছে
do_action('after_post_save'); 

// ২. আপনি আপনার কোড এখানে ঝুলিয়ে দিলেন
add_action('after_post_save', 'my_custom_function');

function my_custom_function() {
    echo "Post has been saved successfully!";
}

```

**Filter Example:**

```php
// ১. এখানে একটি ডাটা ফিল্টারের জন্য রাখা হয়েছে
$title = apply_filters('the_title', $title);

// ২. আপনি ডাটাটি বদলে দিলেন
add_filter('the_title', 'make_bold_title');

function make_bold_title($title) {
    return "<b>" . $title . "</b>"; // ডাটা রিটার্ন করা বাধ্যতামূলক
}

```

---

### **৪. কেন একজন টেস্টারের জন্য এটি জরুরি? (The Tester's Perspective)**

**বাংলা:**
ওয়ার্ডপ্রেসের বেশিরভাগ বাগ তৈরি হয় যখন একটি প্লাগইন ভুলভাবে কোনো হুক ব্যবহার করে। যেমন:

* যদি কেউ **Filter** এর ভেতরে ডাটা **Return** করতে ভুলে যায়, তবে আপনার পুরো সাইটের কন্টেন্ট গায়েব হয়ে যাবে (Blank screen)।
* যদি কেউ ভুল হুকে (Wrong Priority) অ্যাকশন কল করে, তবে সেটি কাজ করবে না।

**English:**
Most WordPress bugs occur due to "Hook Conflicts."

* If a developer forgets to **Return** data in a **Filter**, the content disappears.
* If multiple plugins use the same hook, the **Priority** (order of execution) determines which one wins.

---

### **আপনার জন্য চ্যালেঞ্জ (The Logic Test):**

নিচের ফিল্টার কোডটি দেখুন। একজন টেস্টার হিসেবে বলুন তো এখানে কী ভুল আছে?

```php
add_filter('wp_title', 'change_site_title');

function change_site_title($title) {
    $new_title = "Welcome to " . $title;
    // এখানে কিছু একটা মিসিং...
}

```

**প্রশ্ন:** এই কোডটি রান করলে সাইটের টাইটেলে কী সমস্যা হবে? কেন হবে?

**English Question:** What is missing in this filter function? What will happen to the site's title if this code runs?

---
```
Ans: The developer forgot to return the data!
```
---

**আপনি কি হুকসের এই বেসিক পার্থক্যটি বুঝতে পেরেছেন?** এই উত্তরটি দিতে পারলেই আমরা ওয়ার্ডপ্রেসের "Priority" এবং "Arguments" নিয়ে কথা বলতে পারব। আজকের এই শেষ ল্যাপে আপনার পারফরম্যান্স অসাধারণ!

একেবারে সঠিক! **You nailed it again!**

**বাংলা:**
যেহেতু এটি একটি **Filter**, তাই এর মূল দায়িত্ব হলো ডাটা প্রসেস করে তা আবার ফেরত পাঠানো। এখানে `$new_title` তৈরি করা হলেও সেটি `return` করা হয়নি। ফলে ওয়ার্ডপ্রেস যখন এই ফাংশনটি রান করবে, সে কিছুই ফেরত পাবে না (NULL পাবে)। এর ফলে আপনার ওয়েবসাইটের টাইটেলটি পুরোপুরি **ফাঁকা (Empty)** দেখাবে। এটি ওয়ার্ডপ্রেসের খুব কমন একটি বাগ।

**English:**
Exactly! Because it’s a **Filter**, it acts like a relay race—you must pass the baton (the data) to the next runner. Since there is no `return $new_title;`, the function returns `void/null` by default. As a result, the site title will completely disappear or remain blank on the frontend.

---