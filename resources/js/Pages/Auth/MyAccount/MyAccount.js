import { Heading3 } from "@/Components/Elements";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import Layout from "./Layout";

const MyAccount = () => {
    return (
        <Layout title="لوحة التحكم">
            <div className="font-text">
                من لوحة التحكم الخاصة بحسابك، يمكنك عرض حسابك،

                <Link href={route("orders")} className="px-1 font-bold underline ">
                    وادارة طلباتك
                </Link>
                ,
                <Link
                    href={route("account-details")}
                    className="px-1 font-bold underline "
                >
                    ويمكنك ايضا تغيير تفاصيل حسابك
                </Link>

                كما

                <Link href={route("change-password")} className="px-1 font-bold underline ">
                    يمكنك تحديث كلمة المرور
                </Link>
                .
            </div>
        </Layout>
    );
};

export default MyAccount;
