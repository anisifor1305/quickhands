function HomePage() {
    return ( 
        <>

    {/* <p>Ваш баланс: { balance }</p> */}

     <section id="hero-section" class="hero">
        <div class="container maincont">
            <div class="maintitle">
                <h2 class="maintext">Платформа для выгодного сотрудничества</h2>
            </div>
            {/* <p>Свяжитесь с талантливыми специалистами прямо сейчас!</p>
            <button class="btn btn-primary">Создать проект</button>  */}
        </div>
    </section>
    <section id="services" class="services">
        <div class="container">
            <h2>Выберите свою роль:</h2>
            <div class="service-blocks">
                <div class="block block-orderer">
                    <h3>Я - Заказчик</h3>
                    <p>Quisque volutpat ex non diam vulputate sollicitudin. Etiam sodales tortor in purus rhoncus congue.</p>
                    <a href="/freelancers"><button class="btn btn-outline inbe">Разместить заказ</button></a>
                </div>
                <div class="block block-executor">
                    <h3>Я - Исполнитель</h3>
                    <p>Suspendisse potenti. Aliquam semper sapien nec nunc hendrerit elementum. Donec efficitur est eu risus posuere, ac venenatis felis maximus.</p>
                    <a href="/adverts"><button class="btn btn-outline inbe">Исполнить заказ</button></a>
                </div>
            </div>
        </div>
    </section>

    <section id="about-us" class="about-us">
        <div class="container">
            <h2>О нас</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et eros vel tellus pulvinar porta.</p>
            <p>Proin a dapibus arcu. Integer euismod ante sed magna fermentum feugiat. Vestibulum quis turpis vitae enim tempus accumsan ut at erat.</p>
        </div>
    </section>


    <footer class="footer">
        <div class="container">
            <p class="rights">&copy; QuickHands 2025. Все права пока что не защищены.</p>
        </div>
    </footer>

        </>
     );
}

export default HomePage;