import Banner from "@/Components/Banner";
import Button from "@/Components/Button";
import { TitleH2, SubtTile, Text } from "@/Components/Elements";
import Input from "@/Components/Input";
import Textarea from "@/Components/Textarea";
import TwoSection from "@/Components/TwoSection";
import AppLayout from "@/Layouts/AppLayout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import PrivacySection1 from "@/Pages/Privacy/PrivacySection1";


const PrivacyPolicy = () => {
    return (
        <AppLayout title="سياسة الخصوصية">
            <Banner
                img="/img/contact-us/banner.jpg"
                subTitle="منصة إعمار لخدمات الاعمال"
                title="سياسة الخصوصية"
            />
            <PrivacySection1 />
            {/*<Map />*/}
            {/*<Form />*/}
        </AppLayout>
    );
};

export default PrivacyPolicy;
