import { Link } from "@inertiajs/inertia-react";
import React from "react";
const Breadcrumbs = ({ data = [] }) => {
    return (
        <div className="bg-orange-50">
            <div className="container py-4 text-gray-500 ">
                <div className="flex font-text font-medium">
                    <Link className="hover:underline" href="/">
                        الرئيسية
                    </Link>
                    {data.map((item, key) => (
                        <div key={key}>
                            <span className="px-2">{">"}</span>
                            {item.path ? (
                                <Link
                                    className="hover:underline"
                                    href={item.path}
                                >
                                    {item.name}
                                </Link>
                            ) : (
                                <span>{item.name}</span>
                            )}
                        </div>
                    ))}
                </div>
            </div>
        </div>
    );
};

export default Breadcrumbs;
