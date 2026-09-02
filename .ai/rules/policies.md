---
paths:
  - 'app/Policies/**'
---

# Policies

## Role-based access: policies extend BasePolicy; registrar limited to student models
Users have a `role` string column ('admin', 'webadmin', 'registrar', 'user'). Panel access: admin, webadmin and registrar (see `App\Models\User::canAccessPanel()` and helpers `isAdministrator()`, `isRegistrar()`). Every model has a policy in `app/Policies/` extending `App\Policies\BasePolicy` (which implements the 7 standard methods via `canAccess()`). Admins and web admins get full CRUD on all models; the registrar is additionally allowed full CRUD on only Department, Course, Application and Contact. New model policies must extend `BasePolicy` and override `canAccess()` only when the registrar needs access.
