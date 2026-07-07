# Boom-Framework
## Boom PHP Framework

### Boom Framework can optimize for architectural clarity.

If a developer opens any file in Boom Framework, they should immediately understand:

* what it does,
* why it exists,
* and how it fits into the request lifecycle.

The Three Pillars of Boom Framework: Application, Container, and Configuration.

The framework revolves around these #three core objects:

Application
      │
      ├─────────────┐
      ▼             ▼
Container      Configuration
      │             │
      └──────┬──────┘
             ▼
          Kernel

Think about what each one represents:

Application → Identity ("What application is this?")
Container → Composition ("How are objects created?")
Configuration → Behavior ("How should the application behave?")

The Kernel simply coordinates them.
