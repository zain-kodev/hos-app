
import { Heading6 } from "@/Components/Elements";
import Pagination from "@/Components/Pagination";
import { formatCurrency } from "@/Helpers/helpers";

import { Link } from "@inertiajs/inertia-react";

import Layout from "./Layout";

const Orders = (props) => {
    console.log(props)
    return (
        <Layout title="الطلبات">
            <table className="w-full ">
                <thead>
                    <tr>
                        <th className="py-4 px-2 text-right">
                            <Heading6>#الطلب</Heading6>
                        </th>

                        <th className="py-4 px-2 text-right">
                            <Heading6>التاريخ</Heading6>
                        </th>
                        <th className="py-4 px-2 text-right">
                            <Heading6>حالة الطلب</Heading6>
                        </th>
                        <th className="py-4 px-2 text-right">
                            <Heading6>المجموع</Heading6>
                        </th>
                        <th className="py-4 px-2 text-center">
                            خيارات
                        </th>
                    </tr>
                </thead>
                <tbody className="divide-y divide-gray-200">
                    {props.orders.data.map((order, index) => (
                        <tr key={index}>
                            <td className="py-4 px-2 font-text underline">
                                <Link
                                    href={route("order-details", [order.order])}
                                >
                                    #{order.order}
                                </Link>
                            </td>

                            <td className="py-4 px-2 font-text ">
                                {order.created_at}
                            </td>

                            <td className="py-4 px-2 font-text text-sm ">
                                {order.state == "successful" && (
                                    <span className="px-2 py-1 inline-flex leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        في انتظار الموافقة
                                    </span>
                                )}
                                {order.state == "refunded" && (
                                    <span className="px-2 py-1 inline-flex leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        مسترجع
                                    </span>
                                )}
                                {order.state == "canceled" && (
                                    <span className="px-2 py-1 inline-flex leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        ملغي
                                    </span>
                                )}
                                {order.state == "complete" && (
                                    <span className="px-2 py-1 inline-flex leading-5 font-semibold rounded-full bg-blue-100 text-gray-800">
                                        تمت الموافقة
                                    </span>
                                )}
                            </td>
                            <td className="py-4 px-2 font-text ">
                                {formatCurrency(order.total)}
                            </td>
                            { <td className="px-4 py-5 text-left ">
                                <Link href={route("order-details", [order.order])} className="rounded-md bg-slate-900 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">تفاصيل</Link>
                            </td> }
                        </tr>
                    ))}
                </tbody>
            </table>
            <div className="border-t border-gray-200 px-4 py-5 ">
                <Pagination data={props.orders} />
            </div>
        </Layout>
    );
};

export default Orders;
