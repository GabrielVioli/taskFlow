### 👤 Autenticação & Utilizador
* `GET` `/api/user`
* `GET` `/api/users/{id}/profile`
* `PUT` `/api/users/{id}/profile`

###  Projetos
* `GET` `/api/projects`
* `POST` `/api/projects`
* `GET` `/api/projects/{id}`
* `PUT` `/api/projects/{id}`
* `DELETE` `/api/projects/{id}`

###  Tarefas
* `GET` `/api/projects/{projectId}/tasks`
* `POST` `/api/projects/{projectId}/tasks`
* `GET` `/api/projects/{projectId}/tasks/{taskId}`
* `PUT` `/api/projects/{projectId}/tasks/{taskId}`
* `DELETE` `/api/projects/{projectId}/tasks/{taskId}`

### Tags
* `GET` `/api/tags`
* `POST` `/api/tags`

###  Vinculação (Tarefas e Tags)
* `POST` `/api/projects/{projectId}/tasks/{taskId}/tags/{tagId}`
* `DELETE` `/api/projects/{projectId}/tasks/{taskId}/tags/{tagId}`
