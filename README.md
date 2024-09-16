# pizzapp

App de pizzeria donde el usuario puede comprar pizza online

## Diagrama de la Base de Datos

![Diagrama de base de datos](https://github.com/tomtotomas/pizzapp/blob/main/Diagrama.jpg)

El objetivo de esta base de datos es almacenar los datos del usuario y su orden.

- **Users:** Representa los usuarios registrados de la pizzería, quienes pueden realizar pedidos.
- **Pizza Category:** Clasifica las pizzas en diferentes categorías, como "Clasicas" y "Especiales".
- **Pizzas:** Las diferentes pizzas ofrecidas por la pizzería.

## Estructura de la Base de Datos

1. **User**
   - `user_id`: Identificador único del usuario.
   - `username`: Nombre de acceso a cuenta del usuario.
   - `name`: Nombre del usuario.
   - `email`: Correo electrónico del usuario.
   - `password`: Contraseña de acceso a cuenta del usuario.
   - `birthday`: Fecha de nacimiento del usuario.
   - `adress`: Direccion del usuario.

2. **Category**
   - `category_id`: Identificador único de la categoría.
   - `category_name`: Nombre de la categoría.

3. **Pizza**
   - `pizza_id`: Identificador único de la pizza.
   - `pizza_name`: Nombre de la pizza.
   - `categoria_id`: Referencia a la categoría de la pizza.

- **Pizza** está asociada a una **Category**.
- **Category** puede tener múltiples **Pizza**.

