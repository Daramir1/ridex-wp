import type { Metadata } from "next";
import { headers } from "next/headers";
import "./globals.css";

const title = "rideX — эндуро-прокат в Киеве";
const description = "Эндуро-прокат с экипировкой, инструктором и маршрутами для любого уровня. Выбери мотоцикл и запишись на заезд.";

export async function generateMetadata(): Promise<Metadata> {
  const requestHeaders = await headers();
  const host = requestHeaders.get("x-forwarded-host") ?? requestHeaders.get("host") ?? "localhost:3000";
  const protocol = requestHeaders.get("x-forwarded-proto") ?? (host.startsWith("localhost") ? "http" : "https");
  const origin = `${protocol}://${host}`;

  return {
    metadataBase: new URL(origin),
    title,
    description,
    openGraph: {
      title,
      description,
      type: "website",
      locale: "ru_UA",
      images: [{ url: `${origin}/og.png`, width: 1728, height: 910, alt: "rideX — за пределы дорог" }],
    },
    twitter: {
      card: "summary_large_image",
      title,
      description,
      images: [`${origin}/og.png`],
    },
  };
}

export default function RootLayout({ children }: Readonly<{ children: React.ReactNode }>) {
  return (
    <html lang="ru">
      <body>{children}</body>
    </html>
  );
}
