# El reto

Nos han encargado digitalizar un juego muy conocido en todo el mundo, desde niños a no tan niños… **¡piedra, papel o 
tijera!** Pero esta petición tiene una peculariedad y es que el solo se puede jugar **¡EN CONSOLA😱!**

## Estado actual
Tenemos una versión muy básica. No sabemos muy bien que ha pasado, ya no somos capaces de jugar y no sabemos como
solucionarlo. Así que deberás descubrir y arreglar los errores actuales, además de programar una solución
reutilizable, mantenible y testeable.

## ¿Que debes hacer?

La tarea consiste en programar el juego <<piedra, papel o tijera>> teniendo en cuenta lo siguiente:

### Requisitos:

1. Humano vs Máquina 
2. El humano podrá elegir entre piedra, papel o tijeras 
3. La máquina siempre elige al azar piedra, papel o tijeras 
4. Se jugará un máximo de 5 rondas por partida. 
5. Si un jugador llega a 3 rondas ganadas, la partida finalizará. ¡En nuestra versión aún no lo hemos implementado!
6. Las reglas del juego son sencillas:
   1. Papel vence a piedra 
   2. Piedra vence a tijeras 
   3. Tijeras vence a papel 
   4. Tijeras vs Tijeras, Piedra vs Piedra o Papel vs Papel, será empate.
7. Cuando la partida finaliza, deberemos mostrar una tabla resumén por jugador que nos muestre cuantas veces ha ganado, empatado o perdido:

| Jugador   | Rondas ganadas | Rondas empatadas | Rondas perdidas |
|-----------|----------------|------------------|-----------------|
| Jugador 1 | 1              | 1                | 3               |
| Jugador 2 | 3              | 1                | 1               |

### 🚩 Condiciones :

1. Deberá responder a las siguientes preguntas al finalizar la prueba:
   1. ¿Cuales fueron los desafíos? 
   2. ¿Como los resolviste? 
   3. ¿Por qué lo hiciste de esta manera? 
2. **Solo** se podrá desarrollar en **PHP y consola** 
3. El código deberá implementar buenas prácticas (como POO, patrones de diseño o código limpio y comentado)
4. El código deberá ser extensible en el futuro (cambiar el número de rondas máximas, agregar nuevas reglas…)
5. El desarrollo deberá implementar Testing Unitario
6. **Puntos extras**: Nuestro CTO le encanta la serie **The Big Bang Theory** y nos ha dicho que le encantaría 
jugar a **Piedra, papel, tijera, lagarto, spock**  

### Instrucciones :
Podrás usar tu entorno favorito para ejecutar en consola la aplicación, nosotros usamos (Linux o Windows + WSL2) + Docker

1. Como ejecutar el juego: ``php console game [name]``
2. Como ejecutar el test ``vendor/bin/phpunit .``


