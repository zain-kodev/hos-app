import React from "react";
import AppLayout from "@/Layouts/AppLayout";
import Carousel from "./Carousel";

import TwoSectionMenu from "./TwoSectionMenu";
import CarouselMenu from "./CarouselMenu";
import TwoSectionHours from "./TwoSectionHours";
import OneSection from "./OneSection";
import TwoSectionItems from "./TwoSectionItems";
import TwoSectionContactUs from "./TwoSectionContactUs";
import {Head} from "@inertiajs/inertia-react";

function Home(props) {
    return (
        <AppLayout title="الرئيسية">
            <Head title="الرئيسية" >
                <meta key="description" name="description" content="
شركة منصة إعمار لخدمات الأعمال، هي شركة ريادية استثمارية تعود ملكيتها لشركة منصة إعمار لإدارة المشاريع الاماراتية وهي الشركة المطورة للبرمجيات التقنية لقطاع الأعمال والخدمات الهندسية ونظم المعلومات وهي المالك والمطور منصة منصة إعمار للخدمات الهندسية وخدمات المكاتب الاستشارية وخدمات شركات المقاولات" />
                <link key="apple-touch-icon" rel="apple-touch-icon" sizes="180x180" href="/logo.png"/>
                <link key="icon-32x32" rel="icon" type="image/png" sizes="32x32" href="/logo.png"/>
                <link key="icon-16x16" rel="icon" type="image/png" sizes="16x16" href="/logo.png"/>
                <link key="shortcut-icon" rel="shortcut icon" type="image/x-icon" href="/logo.png"/>
            </Head>
            <div className="">
                <Carousel banners={props.bannersProducts} />
            </div>
            <TwoSectionMenu />
            <CarouselMenu products={props.carouselProducts} />
            <TwoSectionHours />
            <OneSection />
            <TwoSectionItems />
            <TwoSectionContactUs />
        </AppLayout>
    );
}

export default Home;
