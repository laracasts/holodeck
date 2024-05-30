let uniqueId = 0;

export function useUniqueId() {
    return {
        generateUniqueId: (prefix = null) => {
            uniqueId++;

            return prefix ? `${prefix}-${uniqueId}` : uniqueId;
        },
    };
}
