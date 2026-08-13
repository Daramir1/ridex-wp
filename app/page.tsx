"use client";

import type { FormEvent } from "react";
import { useState } from "react";

const bikes = [
  {
    number: "01",
    name: "BSE Z5",
    type: "Лёгкий эндуро · 250 см³",
    level: "Первый выезд",
    image: "/images/bike-light.jpg",
    specs: ["21 л.с.", "112 кг", "мягкая тяга"],
  },
  {
    number: "02",
    name: "KAYO T4",
    type: "Боевой эндуро · 250 см³",
    level: "Есть опыт",
    image: "/images/bike-pro.jpg",
    specs: ["27 л.с.", "6 передач", "энергоёмкая подвеска"],
  },
  {
    number: "03",
    name: "BETA RR",
    type: "Хард-эндуро · 300 см³",
    level: "Уверенный райдер",
    image: "/images/hero-enduro.jpg",
    specs: ["2T", "103 кг", "максимум тяги"],
  },
];

const tariffs = [
  {
    time: "2 часа",
    label: "Пробный",
    price: "3 490 ₴",
    note: "Чтобы понять, почему эндуро затягивает",
    features: ["мотоцикл и топливо", "полная экипировка", "инструктор в группе", "базовый маршрут"],
  },
  {
    time: "4 часа",
    label: "Главный хит",
    price: "5 490 ₴",
    note: "Полноценное приключение с паузой на кофе",
    features: ["мотоцикл и топливо", "полная экипировка", "инструктор в группе", "2 уровня маршрута"],
    featured: true,
  },
  {
    time: "Весь день",
    label: "Максимум",
    price: "8 990 ₴",
    note: "Дальняя трасса, техника и много грязи",
    features: ["до 7 часов катания", "индивидуальный темп", "обед на маршруте", "экшн-фото на память"],
  },
];

const steps = [
  ["01", "Оставь заявку", "Выбери дату, формат и оставь контакты — ответим в течение 15 минут."],
  ["02", "Подбери экипировку", "На базе выдадим шлем, защиту, форму, перчатки и мотоботы по размеру."],
  ["03", "Пройди инструктаж", "Объясним управление, стойку и безопасно потренируемся на площадке."],
  ["04", "Жми на газ", "Инструктор поведёт по маршруту под твой уровень — от лайта до хард-эндуро."],
];

export default function Home() {
  const [menuOpen, setMenuOpen] = useState(false);
  const [sent, setSent] = useState(false);

  function handleSubmit(event: FormEvent<HTMLFormElement>) {
    event.preventDefault();
    setSent(true);
    event.currentTarget.reset();
  }

  function closeMenu() {
    setMenuOpen(false);
  }

  return (
    <main>
      <section className="hero" id="top">
        <header className="site-header">
          <a className="logo" href="#top" aria-label="rideX — на главную">
            ride<span>X</span>
          </a>

          <nav className={menuOpen ? "nav nav--open" : "nav"} aria-label="Основная навигация">
            <a href="#bikes" onClick={closeMenu}>Мотоциклы</a>
            <a href="#prices" onClick={closeMenu}>Цены</a>
            <a href="#certificate" onClick={closeMenu}>Сертификаты</a>
            <a href="#location" onClick={closeMenu}>Как нас найти</a>
          </nav>

          <div className="header-actions">
            <a className="phone" href="tel:+380670000000">+38 067 000 00 00</a>
            <a className="button button--small button--white" href="#booking">Записаться</a>
          </div>

          <button
            className={menuOpen ? "menu-toggle menu-toggle--open" : "menu-toggle"}
            type="button"
            aria-label={menuOpen ? "Закрыть меню" : "Открыть меню"}
            aria-expanded={menuOpen}
            onClick={() => setMenuOpen(!menuOpen)}
          >
            <span />
            <span />
          </button>
        </header>

        <div className="hero-inner page-shell">
          <div className="hero-copy">
            <p className="eyebrow eyebrow--light"><span>Киев</span> · эндуро-прокат</p>
            <h1>За пределы <em>дорог</em></h1>
            <p className="hero-lead">
              Техника, экипировка и маршрут уже готовы. Тебе остаётся только завести мотор.
            </p>
            <div className="hero-buttons">
              <a className="button button--white" href="#booking">Выбрать заезд <span>↗</span></a>
              <a className="text-link text-link--light" href="#bikes">Смотреть парк <span>↓</span></a>
            </div>
            <div className="hero-stats" aria-label="Преимущества rideX">
              <div><strong>12</strong><span>мотоциклов</span></div>
              <div><strong>7</strong><span>маршрутов</span></div>
              <div><strong>0</strong><span>опыта нужно</span></div>
            </div>
          </div>

          <div className="hero-visual" aria-label="Эндуро-райдер на лесной трассе">
            <div className="hero-photo-ring">
              <img src="/images/hero-enduro.jpg" alt="Эндуро-райдер едет по лесной трассе" />
            </div>
            <div className="hero-badge"><span>от</span><strong>3 490</strong><span>₴ / заезд</span></div>
            <div className="hero-route"><span className="pulse" />Ближайший старт: сегодня, 16:30</div>
            <div className="hero-x" aria-hidden="true">X</div>
          </div>
        </div>

        <div className="hero-ticker" aria-hidden="true">
          <span>Экипировка включена</span><b>✦</b><span>Подходит новичкам</span><b>✦</b><span>Инструктор рядом</span><b>✦</b><span>Настоящие маршруты</span>
        </div>
      </section>

      <section className="bikes section" id="bikes">
        <div className="page-shell">
          <div className="section-heading">
            <div>
              <p className="eyebrow">Парк rideX · 2026</p>
              <h2>Выбери свой<br /><span>характер</span></h2>
            </div>
            <p className="section-intro">От понятного четырёхтактника для первого старта до лёгкого двухтактного аппарата для хардовых подъёмов.</p>
          </div>

          <div className="bike-grid">
            {bikes.map((bike) => (
              <article className="bike-card" key={bike.name}>
                <div className="bike-photo">
                  <img src={bike.image} alt={`${bike.name} на маршруте`} loading="lazy" />
                  <span className="bike-number">{bike.number}</span>
                  <span className="level-tag">{bike.level}</span>
                </div>
                <div className="bike-info">
                  <div>
                    <p>{bike.type}</p>
                    <h3>{bike.name}</h3>
                  </div>
                  <a href="#booking" aria-label={`Забронировать ${bike.name}`}>↗</a>
                </div>
                <ul className="bike-specs">
                  {bike.specs.map((spec) => <li key={spec}>{spec}</li>)}
                </ul>
              </article>
            ))}
          </div>
        </div>
      </section>

      <section className="why-section">
        <div className="why-photo">
          <img src="/images/bike-pro.jpg" alt="Райдер выполняет прыжок на эндуро-мотоцикле" loading="lazy" />
        </div>
        <div className="why-copy">
          <p className="eyebrow eyebrow--light">Включено в каждый заезд</p>
          <h2>Тебе —<br />эмоции.<br /><span>Остальное — нам.</span></h2>
          <ul className="check-list">
            <li><b>01</b><span><strong>Исправная техника</strong>Мотоцикл проходит проверку перед каждым стартом.</span></li>
            <li><b>02</b><span><strong>Защита с головы до ног</strong>Экипировка включена в тариф и подбирается по размеру.</span></li>
            <li><b>03</b><span><strong>Инструктор на маршруте</strong>Держит темп группы и помогает на сложных участках.</span></li>
          </ul>
        </div>
      </section>

      <section className="prices section" id="prices">
        <div className="page-shell">
          <div className="section-heading section-heading--light">
            <div>
              <p className="eyebrow eyebrow--light">Цены без сюрпризов</p>
              <h2>Сколько<br /><span>огня?</span></h2>
            </div>
            <p className="section-intro">Во всех тарифах уже есть мотоцикл, бензин, экипировка, инструктаж и сопровождение.</p>
          </div>

          <div className="price-grid">
            {tariffs.map((tariff) => (
              <article className={tariff.featured ? "price-card price-card--featured" : "price-card"} key={tariff.time}>
                <div className="price-top">
                  <span>{tariff.label}</span>
                  {tariff.featured && <b>выбирают чаще</b>}
                </div>
                <h3>{tariff.time}</h3>
                <p>{tariff.note}</p>
                <div className="price-value">{tariff.price}</div>
                <ul>
                  {tariff.features.map((feature) => <li key={feature}>✓ {feature}</li>)}
                </ul>
                <a className={tariff.featured ? "button button--dark button--full" : "button button--outline button--full"} href="#booking">Выбрать тариф <span>↗</span></a>
              </article>
            ))}
          </div>
          <p className="price-note">* Финальная стоимость зависит от выбранной модели и индивидуального формата.</p>
        </div>
      </section>

      <section className="steps section">
        <div className="page-shell">
          <div className="steps-title">
            <p className="eyebrow eyebrow--light">Как всё проходит</p>
            <h2>От заявки<br />до старта</h2>
          </div>
          <div className="steps-grid">
            {steps.map(([number, title, description]) => (
              <article className="step-card" key={number}>
                <span>{number}</span>
                <h3>{title}</h3>
                <p>{description}</p>
              </article>
            ))}
          </div>
        </div>
      </section>

      <section className="certificate section" id="certificate">
        <div className="page-shell certificate-grid">
          <div className="certificate-copy">
            <p className="eyebrow">Подарок, который не пылится</p>
            <h2>Сертификат<br />на <span>драйв</span></h2>
            <p>Выбирай номинал или конкретный заезд. Пришлём электронный сертификат на почту — можно подарить даже сегодня.</p>
            <div className="certificate-values">
              <a href="mailto:hello@ridex.ua?subject=Сертификат rideX на 3500 грн">3 500 ₴</a>
              <a href="mailto:hello@ridex.ua?subject=Сертификат rideX на 5500 грн">5 500 ₴</a>
              <a href="mailto:hello@ridex.ua?subject=Сертификат rideX на 9000 грн">9 000 ₴</a>
            </div>
            <a className="button button--dark" href="mailto:hello@ridex.ua?subject=Хочу подарочный сертификат rideX">Заказать сертификат <span>↗</span></a>
          </div>

          <div className="gift-wrap">
            <div className="gift-photo"><img src="/images/certificate.jpg" alt="Эндуро-райдер на лесном маршруте" loading="lazy" /></div>
            <div className="gift-card">
              <div className="gift-logo">ride<span>X</span></div>
              <p>ПОДАРОЧНЫЙ<br />СЕРТИФИКАТ</p>
              <small>НА ЭНДУРО-ПРИКЛЮЧЕНИЕ</small>
              <b>5 500 ₴</b>
              <i>ЭМОЦИИ ВНУТРИ →</i>
            </div>
          </div>
        </div>
      </section>

      <section className="location" id="location">
        <div className="location-map" aria-label="Схематичная карта проезда к базе rideX">
          <div className="map-grid" />
          <div className="map-road map-road--one" />
          <div className="map-road map-road--two" />
          <div className="map-pin"><span>X</span><b>rideX</b></div>
          <div className="map-label map-label--city">КИЕВ</div>
          <div className="map-label map-label--forest">ГОЛОСЕЕВСКИЙ ЛЕС</div>
        </div>
        <div className="location-copy">
          <p className="eyebrow eyebrow--light">Как нас найти</p>
          <h2>20 минут<br />от <span>Теремков</span></h2>
          <p>База rideX находится в Голосеевском районе. После записи отправим точную геометку и схему въезда.</p>
          <div className="location-facts">
            <div><b>ПАРКОВКА</b><span>Бесплатно на территории</span></div>
            <div><b>ГРАФИК</b><span>Ежедневно, 09:00–20:00</span></div>
          </div>
          <a className="button button--white" href="https://maps.google.com/?q=Holosiivskyi+Kyiv" target="_blank" rel="noreferrer">Открыть район на карте <span>↗</span></a>
        </div>
      </section>

      <section className="booking section" id="booking">
        <div className="page-shell booking-grid">
          <div className="booking-copy">
            <p className="eyebrow">Запись на заезд</p>
            <h2>Готов<br /><span>испачкаться?</span></h2>
            <p>Оставь контакты. Подберём мотоцикл и маршрут под твой опыт, подтвердим свободное время по телефону или почте.</p>
            <a className="booking-phone" href="tel:+380670000000">+38 067 000 00 00</a>
            <a className="booking-email" href="mailto:hello@ridex.ua">hello@ridex.ua</a>
          </div>

          <div className="form-card">
            {sent ? (
              <div className="success-message" role="status">
                <span>✓</span>
                <h3>Заявка принята!</h3>
                <p>Свяжемся с тобой в течение 15 минут и соберём идеальный заезд.</p>
                <button type="button" onClick={() => setSent(false)}>Отправить ещё одну</button>
              </div>
            ) : (
              <form onSubmit={handleSubmit}>
                <div className="form-row">
                  <label>Имя<input type="text" name="name" placeholder="Как к тебе обращаться" required /></label>
                  <label>Телефон<input type="tel" name="phone" placeholder="+38 0__ ___ __ __" required /></label>
                </div>
                <label>Почта<input type="email" name="email" placeholder="you@email.com" required /></label>
                <div className="form-row">
                  <label>Опыт
                    <select name="experience" defaultValue="">
                      <option value="" disabled>Выбери уровень</option>
                      <option>Никогда не ездил</option>
                      <option>Ездил пару раз</option>
                      <option>Уверенный райдер</option>
                    </select>
                  </label>
                  <label>Формат
                    <select name="format" defaultValue="4 часа">
                      <option>2 часа</option>
                      <option>4 часа</option>
                      <option>Весь день</option>
                    </select>
                  </label>
                </div>
                <label>Желаемая дата<input type="date" name="date" required /></label>
                <label className="checkbox"><input type="checkbox" required /><span>Согласен на обработку данных и обратный звонок</span></label>
                <button className="button button--dark button--full" type="submit">Записаться на заезд <span>↗</span></button>
              </form>
            )}
          </div>
        </div>
      </section>

      <footer>
        <div className="page-shell footer-grid">
          <a className="logo logo--footer" href="#top">ride<span>X</span></a>
          <p>Эндуро-прокат для тех,<br />кому мало асфальта.</p>
          <div className="footer-links">
            <a href="#bikes">Мотоциклы</a>
            <a href="#prices">Цены</a>
            <a href="#certificate">Сертификаты</a>
            <a href="#location">Контакты</a>
          </div>
          <div className="footer-socials">
            <a href="https://instagram.com" target="_blank" rel="noreferrer">INST</a>
            <a href="https://t.me" target="_blank" rel="noreferrer">TG</a>
            <a href="https://youtube.com" target="_blank" rel="noreferrer">YT</a>
          </div>
        </div>
        <div className="page-shell footer-bottom"><span>© 2026 rideX</span><span>Катание на эндуро связано с риском. Соблюдайте инструкции.</span></div>
      </footer>
    </main>
  );
}
