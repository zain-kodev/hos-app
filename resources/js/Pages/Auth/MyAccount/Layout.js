import Button from "@/Components/Button";
import { Heading3, Heading4, Heading5, Heading6 } from "@/Components/Elements";
import NavLink from "@/Components/NavLink";
import NotificationSuccess from "@/Components/NotificationSuccess";
import AppLayout from "@/Layouts/AppLayout";
import { Link, useForm } from "@inertiajs/inertia-react";
import React from "react";

const profileRoutes = [
    {
        name: "الرئيسية",
        path: "my-account",
    },
    {
        name: "طلباتك",
        path: "orders",
    },
    {
        name: "معلوماتك",
        path: "account-details",
    },
    {
        name: "تعين كلمة المرور",
        path: "change-password",
    },
];
const Layout = ({ children, title }) => {
    const { post, processing } = useForm();
    const handleLogout = (e) => {
        e.preventDefault();
        post("/logout");
    };

    return (
        <AppLayout title="حسابي">
            <div className="py-section container">
                <div className="grid gap-y-20 md:grid-cols-12 md:gap-6">
                    <div className="space-y-6 md:col-span-3">
                        <Heading3 className="mb-6">حسابي</Heading3>
                        <div >
                            {profileRoutes.map((item, key) => (
                                <Link
                                    key={key}
                                    href={route(item.path)}
                                    preserveScroll
                                    className={
                                        "block border-l-4 py-3 pl-4  " +
                                        (route().current(item.path)
                                            ? "border-gray-400 text-gray-400 "
                                            : "border-gray-100  hover:border-gray-400 hover:text-gray-400")
                                    }
                                >
                                    <Heading6>{item.name}</Heading6>
                                </Link>
                            ))}
                        </div>
                        <div>
                            <form onSubmit={handleLogout}>
                                <Button

                                    processing={processing}
                                >
                                    تسجيل خروج
                                </Button>
                            </form>
                        </div>
                    </div>
                    <div className="md:col-span-9">
                        <div className="space-y-5">
                            <NotificationSuccess />
                            <Heading5>{title}</Heading5>
                            {children}
                        </div>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
};

export default Layout;
