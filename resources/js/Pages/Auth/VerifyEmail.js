import React from 'react';
import Button from '@/Components/Button';
import Guest from '@/Layouts/Guest';
import { Head, Link, useForm } from '@inertiajs/inertia-react';

export default function VerifyEmail({ status }) {
    const { post, processing } = useForm();

    const submit = (e) => {
        e.preventDefault();

        post(route('verification.send'));
    };

    return (
        <Guest>
            <Head title="تأكيد البريد الالكتروني" />

            <div className="mb-4 text-sm text-gray-600">
                شكرا لتسجيلك! قبل البدء، هل يمكنك التحقق من عنوان بريدك الإلكتروني عن طريق النقر على
                الرابط الذي أرسلناه إليك عبر البريد الإلكتروني للتو؟ إذا لم تتلق رسالة البريد الإلكتروني، فسنرسل لك بكل سرور رسالة أخرى.
            </div>

            {status === 'verification-link-sent' && (
                <div className="mb-4 font-medium text-sm text-green-600">
                    تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل.
                </div>
            )}

            <form onSubmit={submit}>
                <div className="mt-4 flex items-center justify-between">
                    <Button processing={processing}>إعادة ارسال بريد التحقق</Button>

                    <Link
                        href={route('logout')}
                        method="post"
                        as="button"
                        className="underline text-sm text-gray-600 hover:text-gray-900"
                    >
                        تسجيل الخروج
                    </Link>
                </div>
            </form>
        </Guest>
    );
}
