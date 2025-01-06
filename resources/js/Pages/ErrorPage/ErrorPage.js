import Button from "@/Components/Button";
import { Heading1 } from "@/Components/Elements";
import AppLayout from "@/Layouts/AppLayout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

const ErrorPage = ({ status }) => {
    console.log(status);
    const title = {
        503: "503: الخدمة غير متوفرة",
        500: "500: خطأ ، حاول مرة اخرى",
        404: "404: الصفحة غير موجودة",
        403: "403: لا يمكن الدخول",
    }[status];

    const description = {
        503: "الموقع تحت الصيانة",
        500: "خطأ ، حاول مرة اخرى",
        404: "الصفحة التي تبحث عنها غير موجودة. من الممكن أن يتم نقلها أو إزالتها بالكامل. احرص على البحث في صفحة أخرى أو الرجوع إلى الصفحة الأولى من موقع الويب للعثور على ما تبحث عنه.",
        403: "لا يمكن الوصل للصفحة المطلوبة",
    }[status];

    return (
        <AppLayout title="خطأ حاول مرة زخرى">
            <div className="py-section container ">
                <div className="flex flex-col gap-20 lg:flex-row">
                    <div className="w-full lg:w-1/2">
                        <p className=" mb-1 font-script text-4xl text-gray-400">
                            خطأ في الصفحة
                        </p>
                        <h1 className="title mb-7 text-5xl lg:text-6xl">
                            {title}
                        </h1>
                        <div className="mb-10 font-text">{description}</div>
                        <Link className="btn btn-md" href={route("home")}>
                            الرجوع للرئيسية
                        </Link>
                    </div>
                    <div className="w-full lg:w-1/2">
                        <img
                            src="/logo.png"
                            className="max-h-[500px]"
                            alt=""
                        />
                    </div>
                </div>
            </div>
        </AppLayout>
    );
};

export default ErrorPage;
