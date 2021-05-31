<p>
The Java client library for BrlAPI on Android
is within a Maven repository that we maintain.
To use it, include the following code within
your project's <code>build.gradle</code> script:
</p>

<pre>
repositories {
  maven {
    url "https://brltty.app/archive/Maven2/"
  }
}

dependencies {
  implementation(
    group: "org.a11y.brltty",
    name: "brlapi-android",
    version: "0.8.2"
  )
}
</pre>

