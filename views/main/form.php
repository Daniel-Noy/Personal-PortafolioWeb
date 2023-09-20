<div class="form__container">
    <p>(El envio del formulario tarda unos momentos)</p>
    <form class="form" action="https://formsubmit.co/danielnm1325@gmail.com" method="POST">
        <div class="form__field">
            <label for="name" class="form__label">Nombre</label>
            <input 
            type="text"
            name="name"
            id="name"
            class="form__input"
            placeholder="Tu Nombre"
            >
        </div>
        <div class="form__field">
            <label for="email" class="form__label">E-mail</label>
            <input 
            type="email"
            name="email"
            id="email"
            class="form__input"
            placeholder="Tu Email"
            >
        </div>
        <div class="form__field">
            <label for="subject" class="form__label">Asunto</label>
            <input 
            type="text"
            name="_subject"
            id="subject"
            class="form__input"
            placeholder="Tu Nombre"
            >
        </div>
        <div class="form__field">
            <label for="message" class="form__label">Mensaje</label>
            <textarea
            name="message"
            id="message"
            class="form__textarea"
            rows="10"
            ></textarea>
        </div>

        <input type="hidden" name="_template" value="table">

        <button type="submit" class="form__submit || button button__secondary"><i class='bx bxs-send'></i> Enviar Correo</button>
    </form>
</div>
