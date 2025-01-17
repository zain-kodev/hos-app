import { Link } from "@inertiajs/inertia-react";

const Pagination = ({ data }) => {
    return (
        <nav
            role="navigation"
            aria-label="Pagination Navigation"
            className="flex justify-between border-t border-gray-200 pt-5"
        >
            <div className="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                <div>
                    <p className=" font-text leading-5 text-gray-700 ">
                        السابق{" "}
                        <span className="font-medium">{data.meta.from}</span> a{" "}
                        <span className="font-medium">{data.meta.to}</span> de{" "}
                        <span className="font-medium">{data.meta.total}</span>{" "}
                        التالي
                    </p>
                </div>
            </div>

            <div>
                {data.meta.total > data.meta.per_page && (
                    <nav
                        role="navigation"
                        aria-label="Pagination Navigation"
                        className="flex justify-between space-x-2 "
                    >
                        {data.links.prev === null ? (
                            <span className="px-4 font-text font-medium text-gray-300">
                                السابق
                            </span>
                        ) : (
                            <Link
                                preserveScroll
                                href={data.links.prev}
                                className="px-4 font-text font-medium"
                            >
                                السابق
                            </Link>
                        )}

                        {data.links.next === null ? (
                            <span className="px-4 font-text font-medium text-gray-300">
                                التالي
                            </span>
                        ) : (
                            <Link
                                preserveScroll
                                href={data.links.next}
                                className="px-4 font-text font-medium"
                            >
                                التالي
                            </Link>
                        )}
                    </nav>
                )}
            </div>
        </nav>
    );
};

export default Pagination;
