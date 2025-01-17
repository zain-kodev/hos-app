import React, { useEffect } from "react";
import Button from "@/Components/Button";
import Checkbox from "@/Components/Checkbox";
import Guest from "@/Layouts/Guest";
import Input from "@/Components/Input";
import Label from "@/Components/Label";
import ValidationErrors from "@/Components/ValidationErrors";
import { Head, Link, useForm } from "@inertiajs/inertia-react";
import AppLayout from "@/Layouts/AppLayout";
import { Heading2, Heading3 } from "@/Components/Elements";

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: "",
        password: "",
        remember: "",
    });

    useEffect(() => {
        return () => {
            reset("password");
        };
    }, []);

    const onHandleChange = (event) => {
        setData(
            event.target.name,
            event.target.type === "checkbox"
                ? event.target.checked
                : event.target.value
        );
    };

    const submit = (e) => {
        e.preventDefault();

        post(route("login"));
    };

    return (
        <AppLayout title="تسجيل الدخول">
            <div className="py-section container">
                {status && (
                    <div className="mb-4 text-sm font-medium text-green-600">
                        {status}
                    </div>
                )}

                <ValidationErrors errors={errors} />
                <div>
                    <Heading2 className="mb-6">تسجيل الدخول</Heading2>
                </div>
                <form onSubmit={submit} className="space-y-5 lg:w-1/2">
                    <div>
                        <Label forInput="email" value="البريد الالكتروني *" />

                        <Input
                            type="text"
                            name="email"
                            value={data.email}
                            className="mt-1 block w-full"
                            autoComplete="username"
                            isFocused={true}
                            handleChange={onHandleChange}
                        />
                    </div>

                    <div className="mt-4">
                        <Label forInput="password" value="كلمة المرور *" />

                        <Input
                            type="password"
                            name="password"
                            value={data.password}
                            className="mt-1 block w-full"
                            autoComplete="current-password"
                            handleChange={onHandleChange}
                        />
                    </div>

                    <div className="mb-4 flex items-center gap-6">
                        <div>
                            <Button processing={processing}>دخول</Button>
                        </div>
                        <div>
                            <label className="flex items-center font-text">
                                <Checkbox
                                    name="remember"
                                    value={data.remember}
                                    handleChange={onHandleChange}
                                />

                                <span className="ml-2 text-sm text-gray-600 mr-2">
                                    تذكرني
                                </span>
                            </label>
                        </div>
                    </div>
                    {canResetPassword && (
                        <Link
                            href={route("password.request")}
                            className="block font-text text-sm text-gray-600 underline hover:text-gray-900"
                        >
                            هل نسيت كلمة المرور ؟
                        </Link>
                    )}
                    <Link
                        href={route("register")}
                        className="block font-text text-sm text-gray-600 underline hover:text-gray-900"
                    >
                        تسجيل جديد
                    </Link>
                </form>
            </div>
        </AppLayout>
    );
}
