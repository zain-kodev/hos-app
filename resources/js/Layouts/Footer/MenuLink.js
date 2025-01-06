import { Link } from "@inertiajs/inertia-react";
import React from "react";

const MenuLink = () => {
    return (
        <div className="title flex justify-center lg:justify-end space-x-5 text-sm mr-2">
            <Link href={route("about-us")}> عن المنصة </Link>
            <Link href={route("contact-us")}> تواصل معنا </Link>
            <Link href={route("privacy-policy")}> سياسة الخصوصية </Link>
            <Link href={route("home")}> الرئيسية </Link>
        </div>
    );
};

export default MenuLink;
